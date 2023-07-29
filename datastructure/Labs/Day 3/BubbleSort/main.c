#include <stdio.h>
#include <stdlib.h>

void Swap(int* data1, int* data2)
{
    int temp;
    temp =*data1;
    *data1=*data2;
    *data2=temp;
}

int sorted =0;
void BubbleSort(int* data, int size)
{
  int index, counter;

  for(counter = 0; counter < size - 1 && sorted == 0; counter++)
  {
    sorted =1;
    for(index =0; index < size-1-counter; index++)
    {
        if(data[index]> data[index+1])
        {
            Swap(&data[index],&data[index+1]);
            sorted =0;
        }
    }
  }
}

void display (int* data, int size)
{
    for (int i=0; i<size; i++)
    {
        printf("%d   ", data[i]);
    }
}

int main()
{
    printf("#Bubble Sort using Array#\n\n");

    int arr[]={4,5,3,6,2,1};
    printf("The Array Before Sorting: ");
    display (arr,6);
    BubbleSort(arr,6);
    printf("\n\nThe Array After Sorting(Bubble Sort) : ");
    display (arr,6);

    return 0;
}
