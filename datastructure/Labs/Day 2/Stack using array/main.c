#include <stdio.h>
#include <stdlib.h>
#define MaxStackSize 5
typedef struct stack
{
    int items[MaxStackSize];
    int top;
}stack;

void push(stack* s, int data)
{
    if (s->top ==(MaxStackSize-1))
        return;
    s->top++;
    s->items[s->top]=data;
}

int pop(stack* s, int* data)
{
    if(s->top==-1)
    {
        return 0;
    }
    *data =s->items[s->top];
    s->top--;
    return 1;
}

//--------------------main--------------------------
int main()
{
    printf("*Stack Using array*\n\n\n");
    stack stk={.top=-1};

    push(&stk,10);
    push(&stk,20);
    push(&stk,30);
    push(&stk,40);
    push(&stk,50);

    int num;
    printf ("After pop the whole items in stack (LIFO) :-\n");

    while (pop(&stk,&num))
    {
        printf("%d  ", num);
    }


    return 0;
}
