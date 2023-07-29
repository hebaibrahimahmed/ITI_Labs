#include <stdio.h>
#include <stdlib.h>

typedef struct Node Node;
struct Node{
    int data;
    Node* next;
};

Node* top=NULL;
//-----------------Push operation---------
void push(int value)
{
    Node* newNode= malloc(sizeof(Node));
    newNode->data=value;

    if (top==NULL)
    {
        newNode->next=NULL;
    }
    else
    {
      newNode->next=top;
    }
    top=newNode;
    printf("%d  is Pushed\n",value);
}
//----------------Pop operation------------
int pop(int* tempdata)
{
   if(top==NULL)
   {
       return 0;
   }
   else
   {
       Node* temp=top;
       *tempdata=top->data;
       top=top->next;
       free(temp);
       return 1;
   }
}
//----------------------main---------------
int main()
{
    printf("*Stack Using Linked List*\n\n");
    push(10);
    push(20);
    push(30);
    push(40);
    push(50);


    int num;

    printf("\n\nThe stack After Pop (LIFO):    \n");
    while(pop(&num))
    {
        printf("%d   ", num);
    }
    return 0;
}
