#include <stdio.h>
#include <stdlib.h>

int main()
{
    int divi, divis, quotient, remainder;
    printf("Enter divi: ");
    scanf("%d", &divi);
    printf("Enter divis: ");
    scanf("%d", &divis);

    quotient = divi / divis;

    remainder = divi % divis;

    printf("Quotient = %d\n", quotient);
    printf("Remainder = %d", remainder);
    return 0;
}
