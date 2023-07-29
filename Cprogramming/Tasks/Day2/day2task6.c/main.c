#include <stdio.h>
#include <stdlib.h>

int main()
{
   int i , x ;

   printf("plz enter the number");
   scanf("%d",&i);

   for( x=1 ; x<=10 ; ++x )
    printf("%d*%d = %d\n", i,x,i*x);
}
