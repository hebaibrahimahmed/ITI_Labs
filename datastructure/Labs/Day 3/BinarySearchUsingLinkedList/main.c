#include <stdio.h>
#include <stdlib.h>
#include <assert.h>

typedef struct Node Node;
struct Node {
   int Data;
   Node* Prev;
   Node* Next;
};

Node* head=NULL;
Node* tail=NULL;
//---------------------------------------
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
//---------------------------------------
void Display()
{
    Node* current = head;
    while(current != NULL)
    {
        printf("%d   ", current->Data);
        current = current->Next;
    }

}

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

int GetDataByIndex(int index)
{
int count=0;
Node* Current=head;

  while(Current!=NULL)
   {
     if (count==index)
     {
       return(Current->Data);
     }
     count++;
     Current=Current->Next;
   }
   assert(0);
}

int BinarySearch(int item,int size)
{
   int minIndex = 0, maxIndex = size , midIndex;

    while(minIndex <= maxIndex)
    {
       midIndex=(minIndex+maxIndex) / 2;
       int dataa= GetDataByIndex(midIndex);
       if (item == dataa)
           return midIndex;

       if (item > dataa)
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
    printf("BinarySearchInLinkedList:\n\n");
    Add(1);
    Add(2);
    Add(3);
    Add(4);
    Add(5);
    Add(6);
    Add(7);
    printf("Your LinkedList: ");
    Display();

    int s = getCountOfNodes();
    printf("\n LinkedList Size is %d\n", s);

    int UserData;
    printf("enter your element that you need to find its index :\n");
    scanf("%d",&UserData);

    int a = BinarySearch(UserData, s);
    printf("the index of element (%d) is:%d",UserData,a);



    return 0;
}
