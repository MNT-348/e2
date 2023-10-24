<?php

function vowelCount($word) 
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $count = 0;

    // Get word from user
    $word = readline('Input word: ');
    // Convert the word to lowercase for case-normalized matching
    $word = strtolower($word);

    // Loop through each character in the word
    for ($i = 0; $i < strlen($word); $i++) 
    {
        if (in_array($word[$i], $vowels))
        { 
            $count++; 
        } 
    } 
    
    return $count; 
}

$count = vowelCount();
echo "Vowel count: $count"