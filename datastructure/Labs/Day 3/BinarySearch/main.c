#include <stdio.h>
#include <stdlib.h>

int BinarySearch(int item, int* data, int size )
{
    int minIndex = 0, maxIndex = size - 1, midIndex;

    while(minIndex <= maxIndex)
    {
       midIndex=(minIndex+maxIndex) / 2;

       if (item == data[midIndex])
           return midIndex;

       if (item > data[midIndex])
       {
         minIndex = midIndex + 1;
       }
       else
       {
         maxIndex = midIndex - 1;
       }
    }

}


int main()
{
    int arr[]={1,2,3,4,5,6,7};
    int UserData;
    printf("Enter your element that you need to find its index: ");
    scanf("%d",&UserData);
    int a = BinarySearch(UserData, arr, 7);
    printf("the index of element %d is %d ", UserData,a);
    return 0;
}
