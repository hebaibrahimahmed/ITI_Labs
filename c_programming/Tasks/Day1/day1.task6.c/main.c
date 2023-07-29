#include <stdio.h>
#include <stdlib.h>

int main(){

int n1,n2,sum,sub,mult;
float div;

printf("please enter 2 entger");
scanf("%d%d",&n1,&n2);

 sum  = n1 + n2;
 sub  = n1 - n2;
 mult = n1 * n2;
div  = n1/(float)n2;

printf("the sum = %d\n",sum);
printf("Difference = %d\n",sub);
printf("Multiplication = %d\n",mult);
printf("Division = %.2f\n",div);

}

