#include <stdio.h>
#include <stdlib.h>

int large(int a, int b, int c)
{
   if (a>b&&a>c) return a;
   else if (b>a&&b>c) return b;
   else return c;

}

int main()
{
   int num1, num2, num3, largest;

   printf("Enter three numbers: ");
   scanf("%d %d %d", &num1, &num2, &num3);

   largest = large(num1, num2, num3);
   printf("Largest number = %d",largest);
   return 0;
}
