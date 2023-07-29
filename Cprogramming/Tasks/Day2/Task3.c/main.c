#include <stdio.h>
#include <stdlib.h>

int main()
{
    int grade;

    printf("please enter your grade");
    scanf("%d",&grade);

    switch(grade)
   {
       case 100 :
       case 90 :
           printf("\n Your Grade is Excellent: A");
           break;
       case 80 :
           printf("\n Your Grade is very good: B" );
           break;
       case 70 :
           printf("\n Your Grade is good : C" );
           break;
       case 60 :

           printf("\n Your Grade is fair: D" );
           break;
    default :

           printf("\n You Grade is:  Failed\n");
            }
   return 0;

}
