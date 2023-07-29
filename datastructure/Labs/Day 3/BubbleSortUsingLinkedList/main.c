#include <stdio.h>
#include <stdlib.h>

typedef struct Node Node;
struct Node {
   int Data;
   Node* Prev;
   Node* Next;
};

Node* head=NULL;
Node* tail=NULL;
//---------------Function Add------------
void Add(int data)
{
    Node *NewNode=malloc(sizeof(Node));
    NewNode->Data=data;
    NewNode->Prev=NewNode->Next=NULL;

    if (head == NULL)
    {
        head = tail = NewNode;
    }

    else{
        tail->Next=NewNode;
        NewNode->Prev=tail;
        tail=NewNode;
    }
}
//-----------------Display-----------------
void Display()
{
    Node* current = head;
    while(current != NULL)
    {
        printf("%d   ", current->Data);
        current = current->Next;
    }

}
//-------------------function to count number of Nodes in linked list----
int getCountOfNodes()
{
    int Count=0;
    Node* temp=head;
    while(temp!=NULL)
    {
        Count++;
        temp=temp->Next;
    }
    return Count;

}
//------------------Swap-----------------------------
void Swap(int* data1, int* data2)
{
    int temp;
    temp =*data1;
    *data1=*data2;
    *data2=temp;
}

//----------------Bubble Sort Function-------------------
void BubbleSort()
{
int sorted =0;
int index, counter;
int CountOfItems = getCountOfNodes();
Node* current = head;
  for(counter = 0; counter < CountOfItems - 1 && sorted == 0; counter++)
  {
    sorted =1;
    while (current->Next!=NULL)
    {
        if(current->Data > current->Next->Data)
        {
            Swap(&current->Data,&current->Next->Data);
            sorted =0;
        }
        current=current->Next;
    }
    current=head;
  }
}
//---------------------------main------------------------
int main()
{
    printf("#Bubble Sort Using Linked List#\n\n");
    Add(4);
    Add(5);
    Add(3);
    Add(6);
    Add(2);
    Add(1);
    printf("linkedList Before Sorting : ");
    Display();

    BubbleSort();
    printf("\n\n linkedList After Sorting(Bubble Sort) : ");
    Display();
    return 0;
}
