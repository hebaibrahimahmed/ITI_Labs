#include <stdio.h>
#include <stdlib.h>

int main()
{
    int num1,num2;

    printf("enter an integer : ");
    scanf("%d", &num1);
    num2 = num1 % 2;
    if (num2 == 0)
        printf("%d is even\n", num1);
    else

  printf("%d is odd\n", num1);


  return 0;
}





