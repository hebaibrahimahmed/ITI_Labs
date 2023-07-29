#include <stdio.h>
#include <stdlib.h>

void swap (int *a, int *b)
{
   int temp = *a;
   *a = *b;
   *b = temp;
}



int main()
{
    int x , y;

    printf ("plz enter the value of X ");
    scanf ("%d", &x );
    printf ("plz enter the value of X ");
    scanf ("%d", &y );

  swap(&x, &y);

  printf("\n new values: x = %d, y = %d", x, y);


    return 0;
}


