/****************************************************************************
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 ***************************************************************************/
 
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include "dictionary.h"

#define HASHTABLE_SIZE 3000

typedef struct node
{
    char word[LENGTH + 1];
    struct node* next;
}
node;

node* hashTable[HASHTABLE_SIZE];

// prototype declaration
int calculateHash(char* key);

// initialize holding the size of the dictionary
int wordCount = 0;

/**
 * Returns true if word is in dictionary else false.
 * Does case insensitive search.
 */
bool check(const char* word)
{
    // temporary variable to store the lower-case string
    char lowered[LENGTH + 1];
    
    // only need to calculate the string length only once
    int wordSize = strlen(word);
    
    // convert every character to lowercase
    for (int i = 0; i < wordSize; i++)
    {
        lowered[i] = tolower(word[i]);
    }
    
    // terminator character is required at the end of our lower-case
    // string, otherwise the comparison will return error
    lowered[wordSize] = '\0';
    
    // calculate the hash value of the lower-case string
    // which gives us the place to search for in the dictionary
    int idx = calculateHash(lowered);
    
    // if the given hash table location is empty, then the word
    // is not in our dictionary
    if (hashTable[idx] == NULL) 
    {
        return false;
    }
    // initialize a search helper cursor node
    node* seek = hashTable[idx];
    
    // seek through the given hash table index using the seek
    // node, comparing all the words along the way to find the match
    while (seek != NULL)
    {
        if (strcmp(lowered, seek->word) == 0) 
        {
            return true;
        }
            seek = seek->next;
        
    }
    
    // after seeking through, if the result is empty, then the word is
    // not in the dictionary
    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    // open the given dictionary file in read-only mode
    FILE* fp = fopen(dictionary, "r");
    
    // error if the file is unaccessable or empty
    if (fp == NULL) return false;
    
    // a variable to store the currently read dictionary word
    char buffer[LENGTH + 1];
    
    // actual line-by-line reading until the end of the file is hit
    while(fscanf(fp, "%s\n", buffer) != EOF)
    {
        // initializate of the temp node
        node* inWord = malloc(sizeof(node));
        
        // the currently read word is copied to the temp node
        strcpy(inWord->word, buffer);
        
        // calculate the words' place in the hash table
        int idx = calculateHash(buffer);
        
        // if the word would be the first in the hash table's given
        // list, then we seat it to be the head of that given list,
        // otherwise we just append it to the list
        if (hashTable[idx] == NULL)
        {
            hashTable[idx] = inWord;
            inWord->next = NULL;
        }
        else
        {
            inWord->next = hashTable[idx];
            hashTable[idx] = inWord;
        }
        
        // a successful line read increments the size 
        // of the dictionary
        wordCount++;
    }
    
    // after reading its contents, close the dictionary file
    fclose(fp);
    
    // successful loading of the dictionary
    return true;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    return wordCount;
}

/**
 * Unload dictionary from memory.  Returns true if successful, else false.
 */
bool unload(void)
{
    // temporary index variable used for traversing the lists
    int idx = 0;
    
    // loop through the lists of the hash table until hitting its end
    while (idx < HASHTABLE_SIZE)
    {
        // if the list is already NULL then we skip onto the next list
        if (hashTable[idx] == NULL) 
        {
            idx++;
        }
        // upon hitting a list with elements, use a temporary seek node
        // to loop through the list, freeing up the elements one-by-one by
        // stepping the seek cursor over the list items. This is necessary
        // in order to keep track of all the elements of the list even after
        // their previous node has been freed up.
        else
        {
            node* seek = hashTable[idx];
            hashTable[idx] = seek->next;
            free(seek);
        }
        
        idx++;
    }
    
    return true;
}

// calculate the hash value of a given character, using a left-shift
// arithmetic shift operator - faster than multiplying
int calculateHash(char* key)
{
    unsigned int hash = 0;
    
    for (int i = 0, n = strlen(key); i < n; i++)
    {
        hash = (hash << 2) ^ key[i];
    }
 
    return hash % HASHTABLE_SIZE;
}