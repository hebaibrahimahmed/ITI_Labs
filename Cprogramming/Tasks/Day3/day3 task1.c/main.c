#include <stdio.h>
#include <stdlib.h>

int main()
{
int array[10];

printf("please enter 10 numbers");

for (int i=0 ; i<10 ; i++)

{
    scanf("%d",&array[i]);

}

printf("the numbers: ");

for (int i=0 ; i<10 ; i++)

{
    printf("%d\n",array[i]);
}

 return 0;
}

