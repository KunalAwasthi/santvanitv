<?php

	header("Content-type:application/json");
	/********************************************************************
	********Back end Script for Essential AJAX calls to do ,*************
	***************** 1)Videos Fetch ************************************ 
	***************** 2)Playlist List ***********************************
	***************** 3)Playlist ListItem *******************************
	***************** 4)Channel Search **********************************
	***************** Root Element is QTYPE (Query Type)*****************
	***************** QTYPE IS SWITCH VAR ***************************
	*********************************************************************
	*********************************************************************
	*********************************************************************/

	
	
	
	$URL = ""; //main URL-VAR for API Call
	$channelID  = 'UCjHSaymdy1qD5a0wBDAgDKA';
	
	if (!file_exists('google-api-php-client-2.2.0' . '/vendor/autoload.php')) 
	{
		throw new Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
	}

	require_once 'google-api-php-client-2.2.0' . '/vendor/autoload.php';

	$DEVELOPER_KEY = 'AIzaSyDjJrKvL98KWwmdcH9aCDU2kShuJXB6Tnc';  // The API key of Project

	$client = new Google_Client();
	$client->setDeveloperKey($DEVELOPER_KEY);

	
	
	// Define an object that will be used to make all API requests.
	$youtube = new Google_Service_YouTube($client);

	
	if(!empty($_GET) || isset($_GET['QTYPE']))  // Server Request Type == POST
	{
		switch($_GET['QTYPE']) /*trim($_POST['QTYPE'])*/
		{
			/*******************************************
			*****searching empty string (<q="">) and ***
			*****using other Params to get flexible data
			***** PARAMS *******************************
			******1)maxResult=int **********************
			******2)order=String ***********************
			********************************************/
			
			case 101 : 
				
				try
				{
					$response = $youtube->search->listSearch(
					'snippet,id',
					array('q' => '',   //always empty
						  'maxResults' => $_GET['maxResults'], //maxResults
						  'order' => $_GET['ord'], //ord
						   'channelId' => $channelID,// always same				
						 )
						);
					$json_response = array();
					
					$i = 0;
					foreach($response->items as $r)
					{
						$json_response[$i] = 
						array(
						'title' => $r['snippet']['title'],
						'id' => $r['id']['videoId'],
						'thumbnail' => $r['snippet']['thumbnails']['default']
						);
						$i++;
					}
					
					$i=0;
					foreach($json_response as $j)
					{
						$json_response[$i]['duration'] = $youtube->videos->listVideos('contentDetails',array('id' => $j['id']))["items"][0]['contentDetails']['duration'];
						$i++;
					}
					$i=0;
					if(isset($_GET['req_stats'])){
						foreach($json_response as $j)
						{
							$json_response[$i]['viewCount'] = $youtube->videos->listVideos('statistics',array('id' => $j['id']))['items'][0]['statistics']['viewCount'];
							$i++;
						}
						
					}
					
					
					echo json_encode($json_response,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
					
				} catch (Google_Service_Exception $e) {
					echo $e->getMessage();
				} catch (Google_Exception $e) {
					$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
					htmlspecialchars($e->getMessage()));
				}
			
				
				
			break;
			
			case 102 : 
				try
				{
					$json_response = array();
					$i = 0;
					$response = $youtube->playlists->listPlaylists(
					'snippet,contentDetails',
					array('channelId' => $channelID,
							'maxResults' => 20
						  )
					);
					
					foreach($response as $r)
					{
						$json_response[$i] 
						= 
						array
						('id' => $r['id'],
						 'title' => $r['snippet']['title'],
						 'description' => $r['snippet']['description'],
						 'videoCount' => $r['contentDetails']['itemCount']
						);
						$i++;
					}
					
					echo json_encode($json_response,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
					
				} catch (Google_Service_Exception $e) {
					echo $e->getMessage();
				} catch (Google_Exception $e) {
					echo $e->getMessage();
				}
			break;
			
			case 103 :
				if($_GET['plistid'])
				{
					try
					{
						$json_response = array();
						$i = 0;
						
						$response = $youtube->playlistItems->listPlayListItems(
						'snippet,contentDetails',
						array(
							'playlistId' => $_GET['plistid'],
							'maxResults' => 20
						)
						);
						
						foreach($response as $r)
						{
							$json_response[$i]
							=
							array(
							'title' => $r['snippet']['title'],
							'id' => $r['contentDetails']['videoId'],
							'thumbnail' => $r['snippet']['thumbnails']['default']
							);
							$i++;
						}
						
					echo json_encode($json_response,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

					}
					catch (Google_Service_Exception $e) {
						echo $e->getMessage();
					} catch (Google_Exception $e) {
						echo $e->getMessage();
					}
					
					
					
				}
			break;
			
			case 104 : 
				
				/***************************************************************
				****IN THIS SECTION THE CHANNEL WILL BE SEARCHED IN TWO SECTIONS 
				************1) ALL Videos **************************************
				************2) ALL Playlist ************************************
				****************************************************************/
				
				if(isset($_GET['q']) && isset($_GET['ord']) && isset($_GET['maxResults']) )
				{
					// FIRST SEARCH THE ALL VIDEOS ON CHANNEL...
					$response = $youtube->search->listSearch(
					'snippet,id',
					array('q' => $_GET['q'],
						  'maxResults' => $_GET['maxResults'],
						  'order' => $_GET['ord'],
						   'channelId' => $channelID,
						   'type' => 'video'
						 )
						);
					$json_response = array();
					$i = 0;
					foreach($response->items as $r)
					{
						$json_response[$i] = 
						array(
						'title' => $r['snippet']['title'],
						'id' => $r['id']['videoId'],
						'thumbnail' => $r['snippet']['thumbnails']['default']
						);
						$i++;
					}
					$i=0;
					foreach($json_response as $j)
					{
						$json_response[$i]['duration'] = $youtube->videos->listVideos('contentDetails',array('id' => $j['id']))["items"][0]['contentDetails']['duration'];
						$i++;
					}
					
					
				
					echo json_encode($json_response,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
					
				}
				
				
				
			break;
			
			case 105:
			
			break;
			
		} //switch ends
		
		
		
	}//IF_ENDS






?>