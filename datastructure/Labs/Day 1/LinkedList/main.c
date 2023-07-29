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

void Display()
{
    Node* current = head;
    while(current != NULL)
    {
        printf("%d   ", current->Data);
        current = current->Next;
    }

}

Node* GetNodeByData(int data)
{
    Node* current = head;

    while(current != NULL)
   {
        if(data == current->Data)
            return current;

        current = current->Next;
    }

    return NULL;
}


void insert(int data, int afterdata)
{
Node* h =GetNodeByData(afterdata);
 Node* NewNode=malloc(sizeof(Node));
 NewNode->Data=data;

 Node* temps=h->Next;
 h->Next=NewNode;
 NewNode->Prev=h;

 temps->Prev=NewNode;
 NewNode->Next=temps;

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
void Remove(int data)
{
    Node* node = GetNodeByData(data); //take the node that i need to remove and return pointer node that refer on it.

    if (node == NULL)// if the node does not exist, i will return from the function
        return;
    if (node == head)
    {
        if(head=tail)// or(head->next=NULL) it mean that the head is the only node in the linked list the first and last
        {
            head = tail = NULL;
        }
        else// there exist another node after head
        {
            head = head->Next;
            head->Prev=NULL;
        }
    }
    else if(node==tail)
    {
        tail=tail->Prev;
        tail->Next=NULL;
    }
    else
    {
         node->Prev->Next=node->Next;
         node->Next->Prev=node->Prev;

    }

    free(node);
}

int main()
{

    printf("The Linked List as follows\n\n");
    Add(3);
    Add(5);
    Add(7);
    Add(9);
    insert(8,7);
    insert(4,3);
    insert(6,5);

    Display();

    int x=getCountOfNodes();

    printf("\n\nNumber of Nodes in Linked List is= %d\n",x);

    printf("\n Enter your index that you need to find the data in this index:");
    int y;
    scanf("%d",&y);

    int yourdata=GetDataByIndex(y);

    printf("the data on index %d is %d ",y,yourdata);

    printf("\n\n\n Enter your data that you are need to remove it from the Linked list :");
    int R;
    scanf("%d",&R);
    Remove(R);

    printf("The new Linked List After Remove\n");
    Display();

    return 0;
}
