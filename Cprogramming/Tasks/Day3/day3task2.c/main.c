#include <stdio.h>
#include <stdlib.h>

int main()
    {
   int array[10],i,x, max;

     printf("Enter size of the array : ");

      scanf("%d",&x);

       printf("please enter the elements : ");


     for ( i=0 ; i<x ; i++)
       {
           scanf("%d",&array[i]);
       }

       max=array[0];
       for (i=1 ; i< x ; i++)
       {
           if (max <array[i])
            max=array[i];
       }
          printf("\nmaximum of array is : %d",max);


    return 0;
}

