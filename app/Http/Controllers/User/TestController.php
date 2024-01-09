<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function test()
    {
// Create a task queue
        $taskQueue = new TaskQueue();

// Enqueue tasks
        $taskQueue->enqueue("A");
        $taskQueue->enqueue("B");
        $taskQueue->enqueue("C");

// Peek at the front task
        $taskQueue->peek();

// Dequeue and process tasks
        $processedTask = $taskQueue->dequeue();
        if ($processedTask !== null) {
            // Simulate task processing (you can replace this with your actual processing logic)
            echo "Processing '$processedTask'...\n" . "<br>";
        }

// Peek again after processing
        $taskQueue->peek();

// Dequeue another task
        $processedTask = $taskQueue->dequeue();
        if ($processedTask !== null) {
            // Simulate task processing
            echo "Processing '$processedTask'...\n" . "<br>";
        }

// Try to dequeue from an empty queue
        $taskQueue->dequeue();

    }
}
class TaskQueue
{
    private $queue;

    public function __construct()
    {
        $this->queue = array();
    }

    public function enqueue($task)
    {
        $this->queue[] = $task;
        echo "Task '$task' has been added to the queue." . "<br>";
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }
    public function dequeue()
    {
        if ($this->isEmpty()) {
            echo "Queue is empty. No task to dequeue.\n" . "<br>";
            return null;
        }

        $task = array_shift($this->queue);
        echo "Task '$task' has been dequeued and is being processed.\n" . "<br>";

        return $task;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            echo "Queue is empty. No task to peek.\n" . "<br>";
            return null;
        }

        $frontTask = $this->queue[0];
        echo "Next task in the queue: '$frontTask' " . ("(peeking '$frontTask' ) ") . "<br>";

        return $frontTask;
    }

}

// Create a task queue
