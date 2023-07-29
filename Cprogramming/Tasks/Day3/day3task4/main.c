#include <stdio.h>
#include <stdlib.h>

int main()
{
 int arr[2][3];
 int i,j;
 int sum[2]={0};
 int sumcol[3]={0};
 int avg;

 printf("please enter the elements of the array \n");

 for(i=0;i<2;i++)
 {
     for(j=0;j<3;j++)
     {
         scanf("%d",&arr[i][j]);
     }
 }

 for(i=0;i<2;i++)
 {

     for(j=0;j<3;j++)
     {
        sum[i]+=arr[i][j];
     }
 }

 for(int i=0;i<2;i++)
 {
     printf(" the sum is\n %d ",sum[i]);
 }

 for(j=0;j<3;j++)
 {
     for(i=0;i<2;i++)
     {
        sumcol[j]+=arr[i][j];
     }

     avg=sumcol[j]/2;
     printf(" %d ",avg);

 }

}
