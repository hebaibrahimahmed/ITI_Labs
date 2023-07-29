#include <stdio.h>
#include <stdlib.h>

typedef struct Node Node;
struct Node {
    int data;
    Node* next;
};

Node* front=NULL;
Node* rear=NULL;

void EnQueue(int value)
{
   Node* NewNode = malloc(sizeof(Node));
   if (NewNode==NULL)
   {
       return;
   }
   else
   {
      NewNode->data = value;
      NewNode->next=NULL;
      if(front==NULL)
      {
        front=rear=NewNode;
      }
      else
      {
        rear->next = NewNode;
        rear=NewNode;
      }
   }
}

int Dequeue(int* tempsdata)
{

    Node *temp = front;
    if(front==NULL){
        return 0;
    }
    else{
        Node *temp = front;
        *tempsdata = temp->data;
        front = front->next;
        free(temp);
    }
    return 1;
}


int main()
{
    printf(" Please Find the Queue using LinkedList\n");
    EnQueue(10);
    EnQueue(20);
    EnQueue(30);
    EnQueue(40);
    EnQueue(50);
    EnQueue(60);
    EnQueue(70);
    EnQueue(80);
    EnQueue(90);


    int num;

    printf("\n\nThe Queue After Dequeue (FIFO):    \n");

    while(Dequeue(&num))
    {
        printf("%d ", num);
    }
    return 0;
}
