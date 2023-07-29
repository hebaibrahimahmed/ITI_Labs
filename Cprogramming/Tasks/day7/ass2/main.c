#include <stdio.h>
#include <stdlib.h>

int main ()
{

int **ptr;
    int rows,cols;

    int *sum;
    int *avg;

    printf("Enter The Number Of Students You Want and The Number Of Subjects: ");
    scanf("%d %d",&rows,&cols);
    ptr = malloc(rows * sizeof(int *));

    sum = malloc(rows * sizeof(int));
    avg = malloc(cols * sizeof(int));

    printf("-----------------------------\n\n");
    for(int i=0;i<rows;i++){

        int s=0;
        ptr[i]= malloc(cols * sizeof(int));
        printf("Enter The data Of Student Number {%d}\n",i+1);

        for(int j=0;j<cols;j++){

            printf("Enter The Degree Of The Subject Number { %d }: ", j+1);
            scanf("%d",&ptr[i][j]);
            s+=ptr[i][j];
        }
        sum[i]=s;
        printf("\n");
    }

    for(int i=0;i<cols;i++){
        int a=0;
        for(int j =0;j<rows;j++)
            a+= ptr[j][i];
        avg[i]=a/rows;
    }

    printf("The Degree IS \n");
    printf("============================\n");
    for(int i=0;i<rows;i++){
        for(int j=0;j<cols;j++){
            printf("%d \t", ptr[i][j]);
        }
        printf("\n");
    }

    printf("\nThe sum \n");
     for(int i=0;i<rows;i++){
        printf("%d \n",sum[i]);
    }

    printf("\nThe Avg \n");
     for(int i=0;i<cols;i++){
        printf("%d \n",avg[i]);
    }
return 0;
}
