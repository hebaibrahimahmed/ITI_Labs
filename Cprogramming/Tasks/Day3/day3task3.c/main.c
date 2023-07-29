#include <stdio.h>
#include <stdlib.h>

int main()
   {
    int mat1[10][10], mat2[10][10], matadd[10][10];

    int x, y, i, j;

    printf("Enter the size of matrix:-\n");
    printf("plz enter the row size:");
    scanf("%d",&x);
    printf("Enter column size:");
    scanf("%d",&y);
    printf("\nEnter elements of first matrix:");
    for(i=0; i<x; i++)
    {
        for(j=0; j<y; j++)
            scanf("%d", &mat1[i][j]);
    }
    printf("Enter elements of second matrix:");
    for(i=0; i<x; i++)
    {
        for(j=0; j<y; j++)
            scanf("%d", &mat2[i][j]);
    }
    for(i=0; i<x; i++)
    {
        for(j=0; j<y; j++)
            matadd[i][j] = mat1[i][j] + mat2[i][j];
    }
    printf("\nThe matrix after addition:\n");
    for(i=0; i<x; i++)
    {
        for(j=0; j<y; j++)
            printf("%d ",matadd[i][j]);
        printf("\n");
    }
    getch();

    return 0;
}
