<?php

use Illuminate\Support\Facades\DB;
use PhpTokenizer\Tokenizer;

class ProjectSimilarityChecker {
    public function checkSimilarity($title, $description) {
        // Tokenize the title and description
        $tokenizer = new Tokenizer();
        $titleTokens = $tokenizer->tokenize($title);
        $descriptionTokens = $tokenizer->tokenize($description);

        // Calculate the TF-IDF scores
        $tfIdfScores = [];
        foreach ($titleTokens as $token) {
            $tfIdfScores[$token] = $this->calculateTfIdf($token, $titleTokens, $descriptionTokens);
        }

        // Calculate the cosine similarity
        $similarities = [];
        $projects = DB::table('projects')->get();
        foreach ($projects as $project) {
            $projectTfIdfScores = [];
            foreach ($project->title_tokens as $token) {
                $projectTfIdfScores[$token] = $this->calculateTfIdf($token, $project->title_tokens, $project->description_tokens);
            }
            $similarity = $this->calculateCosineSimilarity($tfIdfScores, $projectTfIdfScores);
            $similarities[] = [
                'project_id' => $project->id,
                'imilarity' => $similarity,
            ];
        }

        // Return the similarity percentage
        usort($similarities, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });
        return $similarities;
    }

    private function calculateTfIdf($token, $titleTokens, $descriptionTokens) {
        // Calculate TF
        $tf = count(array_filter($titleTokens, function ($t) use ($token) {
            return $t === $token;
        })) / count($titleTokens);

        // Calculate IDF
        $idf = log(count(DB::table('projects')->get()) / count(DB::table('projects')->where('title_tokens', 'like', "%$token%")->get()));

        // Calculate TF-IDF
        return $tf * $idf;
    }

    private function calculateCosineSimilarity($tfIdfScores1, $tfIdfScores2) {
        $dotProduct = 0;
        $magnitude1 = 0;
        $magnitude2 = 0;
        foreach ($tfIdfScores1 as $token => $score) {
            $dotProduct += $score * ($tfIdfScores2[$token]?? 0);
            $magnitude1 += $score ** 2;
        }
        foreach ($tfIdfScores2 as $token => $score) {
            $magnitude2 += $score ** 2;
        }
        $magnitude1 = sqrt($magnitude1);
        $magnitude2 = sqrt($magnitude2);
        return $dotProduct / ($magnitude1 * $magnitude2);
    }
}