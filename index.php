<h2>Pig Lattin Traslator</h2>
<hr />
<form method="GET" action="lab7objective1.php">

<b>Type a word you want to translate or an entire sentence here</b> <input type="text" style="width:300px;background-color:yellow;"
 name="word" value="" /> 
<input type="submit" value="submit" /> 
</form>
<?

//this gets the global $_GET variable if it exist and assignes it to a variable, if it doesn't exist it uses a default value
if($_GET["word"]){
	 $word = $_GET["word"];
	 }else{
	 $word = "pig lattin machine";
	}

//this defines a varable for the letters that come at the end of every word
$endofword = "ay";	

//this turns the $word variabel into an array
$phrase = explode(" ",$word);
//this finds the length of the array
$phraseLength= count($phrase);


//this function turns each word in the array into pig lattin
function pigTheWord($oldWord,$endofword){
	
	
	$wordLength = strlen($oldWord);//this finds the length of the current word
	$pos = strcspn(strtolower($oldWord), "aeiou"); //this finds the position of the first vowel in the current word
	$firstLetter = substr($oldWord,0,$pos);// this saves the first letter or letters that are not a voewl
	$punctuation = substr($oldWord,$wordLength - 1,$wordLength); //this saves the last charicter in a string, I need this in case there is a punctuation mark
	
	//this checks if the word is at least 3 letters long, if not it just echos the origonal word
	if($wordLength > 2){
		
		
		if(preg_match("/(\?|\.|\!)$/", $oldWord)){ //this checks if the strting has a punctuation mark 
			$oldWord = substr($oldWord,0,$wordLength-1);//if there is a punctuation mark, it's stripped off the string
				if($pos > 0){ //if the first letter is not a vowel
				//the non-vowels are stripped, the non-vowels are added back to the end, the "ay" is added on, the punctuation is added back on.
				$pigWord = substr($oldWord,$pos) . $firstLetter . $endofword . $punctuation ; 
				}else{
				//if the fist letter is a vowel, the "ay" and punctuation are added to the end of the word
				$pigWord = $oldWord . $endofword . $punctuation;
				}
		}else{ //if the string has no punctuation mark it does the same as the above code exept for addinf the punctuation.
		
				if($pos > 0){
				$pigWord = substr($oldWord,$pos) . $firstLetter . $endofword;
				}else{
				$pigWord = $oldWord . $endofword;
				}
			}	
		}else{ // if the string is less than 3 letters long it just saves the string
		$pigWord = $oldWord;
		}
			//here it echos the newly formated string and makes the first letter upper case
		echo '<b style="color:blue;font-size:30px;">' . ucfirst($pigWord) . '</b> ';			
		}
	
echo '<h3>Your origonal word or phrase was: <b><span style="color:blue;font-size:30px;">' . $word . '</span></b></h3>';
echo '<h3>your Pig Latin conversion is:';

//this loop calls the "function for each word in the $phrase array
for($i=0; $i < $phraseLength; $i++){
pigTheWord($phrase[$i],$endofword);
}
echo "</h3>";
?>