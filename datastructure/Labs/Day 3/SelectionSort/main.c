#include <stdio.h>
#include <stdlib.h>
void Swap (int* data1, int* data2)
{
    int temp = *data1;
    *data1 = *data2;
    *data2 = temp;
}
void SelectionSort(int *data, int size)
{
    int counter;

    for(counter = 0; counter < size - 1; counter++)
    {
        int minIndex = counter, index;

        for(index = minIndex + 1; index < size; index++)
        {
            if(data[index] < data[minIndex])
                minIndex = index;
        }

        Swap(&data[counter], &data[minIndex]);
    }
}
void display(int* data, int size)
{
    for(int i=0; i<size; i++)
    {
        printf("%d  ", data[i]);
    }
}
int main()
{
    printf("#Selection Sort#\n\n");
    int arr[]={4,5,3,6,2,1};

    printf("Array Before Sorting:  ");
    display(arr, 6);
    SelectionSort(arr,6);
     printf("\nArray After Sorting(insertion sort):  ");
    display(arr, 6);
    return 0;
}
