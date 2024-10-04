<?php

namespace App\Services;
use App\Models\SurveyData;
use Aws\BedrockRuntime\BedrockRuntimeClient;
class AIService {

	public $standardHeader='Here is the question that was asked in the survey. \n\n'; 
	public $standardFooter='Give your response in the "prompt_response" key in the json object shown below. \n\nDo not give additional explanation outside of the json object. \n\n Do not return array in prompt_response key \n\n




                    [
                        {
                            "prompt_response": ""
                            
                        }
                    ]
                        
                 

                     '.'\n\n'. 
                     
                     'here is the response'. '\n\n';
	
	public function setPromptForLlama($question, $rules, $response)
	{
		$prompt=$this->standardHeader. $question.'\n\n'. $rules. $this->standardFooter. $response['data']. '> ```json';
		return $prompt;
	}
    public function invokeAWSLlama3_70b($prompt)
    {
        $bedrockClient = new BedrockRuntimeClient([
            'version' => 'latest',
            'region' => config('services.bedrock.region'), // Replace with your region
            'credentials' => [
                'key' => config('services.bedrock.key'),
                'secret' => config('services.bedrock.secret'),
            ],
        ]);
        $completion = "";

        try {
            $modelId = 'meta.llama3-1-70b-instruct-v1:0';

            $body = [
                'prompt' => $prompt,
                'temperature' => 0.5,
                'max_gen_len' => 512,
            ];

            $result = $bedrockClient->invokeModel([
                'contentType' => 'application/json',
                'body' => json_encode($body),
                'modelId' => $modelId,
            ]);

            $response_body = json_decode($result['body']);

            $completion = $response_body->generation;

        } catch (Exception $e) {
            echo "Error: ({$e->getCode()}) - {$e->getMessage()}\n";
        }

        return $this->getProcessedResultsArray($completion);
    }


	public function getProcessedData($prompt)
	{
		$response = \Http::timeout(600)->post('http://llama:11434/api/chat', [
                'model' => 'llama3.1:8b',
                'messages' => [[
                    'role' => 'user',
                    'content' => $prompt

                    ]
                ],
                'stream' => false,
                'response_format' => 'json'


        ]);
        $result=json_decode($response->body()); // Get the response body
        // return $result;
        $completion = $result->message->content; // your string

        
        return $this->getProcessedResultsArray($completion);
	}
    public function getProcessedResultsArray($completion)
    {
        $string=$completion;
        if (substr($string, 0, 1) === '[') {
            $start = strpos($string, '[');
            $end = strpos($string, ']', $start);
            $labelarrays = json_decode(substr($string, $start, $end - $start + 1), TRUE);
        } elseif (substr($string, 0, 1) === '{') {
            $labelarrays = json_decode($string);
        } else {

            //$labelarrays='String starts with neither [ nor {';
            $output = $string;
            switch (true) {
                case strpos($output, '[') !== false && strpos($output, '{') !== false && strpos($output, '[') < strpos($output, '{'):
                    $start = strpos($string, '[');
                    $end = strpos($string, ']', $start);
                    $labelarrays = json_decode(substr($string, $start, $end - $start + 1), TRUE);
                    break;
                case strpos($output, '{') !== false:
                    $start = strpos($string, '{');
                    $end = strpos($string, '}', $start);
                    $labelarrays = json_decode(substr($string, $start, $end - $start + 1), TRUE);
                    break;
                default:
                    $labelarrays='String starts with neither [ nor { and is not in gthe right format';
                    break;
            }

        }
        
        // \DB::table('insight_summaries')->updateOrInsert(
        //     ['cjob_id' => $cjob_id],
        //     ['summary' => json_encode($labelarrays), 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()]
        // );
        $resultArray['raw_data']=$string;
        $resultArray['processed_data']=$labelarrays;
        return $resultArray;
    }
	public function getResponseFromLlama() {
       	
     	$cjob_id = 7;
        $survey_data=SurveyData::find($cjob_id);
        $app_data=json_decode($survey_data->data, true)['a_9'];
        //$insights_json=json_encode($insights);
        //return $insights_json;
        $response = \Http::timeout(600)->post('http://localhost:11434/api/chat', [
                'model' => 'llama3',
                'messages' => [[
                    'role' => 'user',
                    'content' => '

                    Here is the question that was asked in the survey. \n\n

                    Please tell us about the creative project that you plan to develop through the Creatives For Our future program, and what you aim to achieve by the end of the program (April 2026) - please include tangible goal/outcome 

                    
                    Here are the rules to evaluate the response. 

                    
                    Response must have objectives.


                    Response must have goals.


                    Response must have activities. 


                    
                    Return  "TRUE" if all the 3 rules are satisfied.



                    
                    If you dont know just say "FALSE".


                    
                    Return as a JSON object shown below.


                    Do not give additional explanation outside of the json object.


                    [
                        {
                            "evaluation_result": "TRUE or FALSE",
                            "evaluation_reason": "justification for evaluation"
                            
                        }
                    ]
                        
                 

                     '.'\n\n'. 
                     
                     'here is the response'. '\n\n'.
                     
                     $app_data. '```json'

                    ]
                ],
                'stream' => false,
                'response_format' => 'json'


        ]);
        $result=json_decode($response->body()); // Get the response body
        // return $result;
        $start = strpos($result->message->content, '[');
        $end = strpos($result->message->content, ']', $start);
        $labelarrays = json_decode(substr($result->message->content, $start, $end - $start + 1), TRUE);
        // \DB::table('insight_summaries')->updateOrInsert(
        //     ['cjob_id' => $cjob_id],
        //     ['summary' => json_encode($labelarrays), 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()]
        // );
        return json_encode($labelarrays);
        //throw new \Exception('Survey is no longer active'); 
        
    }
    public function getResponseFromOpenAi() {
       	
     
        //throw new \Exception('Survey is no longer active'); 
        
    }
}