#include <stdio.h>
#include <stdlib.h>


void Test (int *p)
{

    printf("the values after multiplying ");

   for (int i =0 ;i<5 ; i++)
   {
      printf ("%d\t ", p[i]*10);
   }
}


int main ()
{
 int array[5];
 int i;

 printf("please Enter The Numbers");

  for (int i =0 ;i<5 ; i++)
  {
    scanf("%d",&array[i]);
  }

 Test(&array);

  return 0 ;
}
