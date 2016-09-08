<?php

namespace Solvice\Http;

use \GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Solvice\Exception\SolviceRequestException;
use Solvice\Job\Job;
use Solvice\Job\JobFactory;
use Solvice\Solver\Response;
use Solvice\Solver\Solver;

/**
 * Class Client
 *
 * @package Solvice\Http
 */
class Client
{
    /**
     * @var GuzzleClient
     */
    private $client;

    /**
     * @var JobFactory
     */
    private $jobFactory;

    /**
     * Client constructor.
     *
     * @param Config     $config
     * @param JobFactory $jobFactory
     */
    public function __construct(Config $config, JobFactory $jobFactory)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $config->getApiEndpoint(),
            'headers' => ['Content-Type' => 'application/json'],
            'auth' => $config->getAuth(),
        ]);

        $this->jobFactory = $jobFactory;
    }

    /**
     * @param Solver $solver
     *
     * @return string
     */
    public function solve(Solver $solver)
    {
        $response = $this->request('POST', '/v1/solve', [
            'body' => $solver->toJson(),
        ]);

        return Response::fromJson($response, $solver);
    }

    /**
     * @return string
     */
    public function jobs()
    {
        return $this->request('GET', '/jobs');
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function job($id)
    {
        return $this->request('GET', '/jobs/'.$id);
    }

    /**
     * @return string
     */
    public function queue()
    {
        return $this->request('GET', '/queue');
    }

    /**
     * @param $id
     *
     * @return Job
     */
    public function fetchJob($id)
    {
        $response = $this->job($id);
        $jobData = json_decode($response, true);

        if ($jobData === null) {
            // could not decode job
            // throw new InvalidSolviceJobException();
        }

        return $this->jobFactory->buildJob(
            $jobData['solver'],
            $jobData
        );

        return $jobData;
    }

    /**
     * @param       $method
     * @param       $path
     * @param array $options
     *
     * @return string
     * @throws SolviceRequestException
     */
    private function request($method, $path, $options = [])
    {
        try {
            $response = $this->client->request($method, $path, $options);
            return $response->getBody()->getContents();
        } catch (ClientException $e) {
            throw  (new SolviceRequestException())
                ->setError($e->getResponse()->getBody());
        } catch (GuzzleException $e) {
            throw new SolviceRequestException($e->getMessage());
        }
    }
}