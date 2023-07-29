#include <stdio.h>
#include <stdlib.h>
void InsertionSort(int *data, int size)
{
    int key, counter, index;

    for(counter = 1; counter < size; counter++)
    {
        key = data[counter];
        index = counter - 1;

        while(index >= 0 && data[index] > key)
        {
            data[index + 1] = data[index];
            index--;
        }

        data[index + 1] = key;
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
    printf("#insertion sort#\n\n");

    int arr[]={1,4,2,6,3,5};
    display(arr,6);
    InsertionSort(arr,6);
    printf("\n");
     display(arr,6);
    return 0;
}
