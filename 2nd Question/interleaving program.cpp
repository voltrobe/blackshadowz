// C++ program to check if string C is an interleaving of String A and B

#include<iostream.h> 
bool isInterleaved (char *A, char *B, char *C);

// Main Function
int main()
{
    char *A = "AB";
    char *B = "CD";
    char *C = "ACBG";
    if (isInterleaved(A, B, C) == true)
		cout<<C<<" is Interleaved of "<<A<<" and "<<B;
    else
        	cout<<C<<" is Not Interleaved of "<<A<<" and "<<B;
 
    return 0;
}

// Returns true if C is an interleaving of A and B,
// otherwise returns false
bool isInterleaved (char *A, char *B, char *C)
{
    // Iterate through all characters of C.
    while (*C != 0)
    {
       
        if (*A == *C)
            A++;
        else if (*B == *C)
            B++;

        else
            return false;
        C++;
    }
 
    // If length of C  is smaller than sum of lengths of A and B, return false

    if (*A || *B)
        return false;
 
    return true;
}