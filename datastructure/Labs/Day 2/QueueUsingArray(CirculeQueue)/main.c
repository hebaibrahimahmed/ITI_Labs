#include <stdio.h>

#define MaxSizeQueue 5

typedef struct Queue
{
   int items[MaxSizeQueue];
   int front;
   int rear;
}Queue;

// Function to Check if the queue is full or not
int IsFull(Queue* q)
{
    if((q->front == q->rear+1) || (q->front == 0 && q->rear == MaxSizeQueue-1))
        return 1;
    return 0;
}

// Function to Check if the queue is empty or not
int IsEmpty(Queue* q)
{
    if(q->front ==-1)
        return 1;
    return 0;
}
//Function to Enqueue element in Circular Queue.
void EnQueue(Queue* q,int data)
{
    if (IsFull(q))
    {
        return;
    }
    else
    {
        if (q->front==-1)
          q->front=0;
          q->rear=(q->rear+1) %MaxSizeQueue;
          q->items[q->rear]=data;

          printf("\n %d is inserted", data);
    }
}
// Function to DeQueue element in Circular Queue
 int DeQueue(Queue* q,int* data)
 {
     if(IsEmpty(q))
     {
         return 0;
     }
     else
     {
         *data=q->items[q->front];
         if(q->front==q->rear)
         {
            q->front=-1;
            q->rear=-1;
         }
         else
         {
            q->front = (q->front + 1) % MaxSizeQueue;
         }
        return 1;
     }
 }


int main() {

    printf("*Circular Queue using Array*");
    Queue que={.front=-1, .rear=-1};

    IsFull(&que);
    IsEmpty(&que);
    EnQueue(&que,10);
    EnQueue(&que,20);
    EnQueue(&que,30);
    EnQueue(&que,40);
    EnQueue(&que,50);


    printf("\n\nElement in Circular Queue After Dequeue (FIFO) \n");
int num;
    while(DeQueue(&que,&num))
    {
        printf("%d    ", num);
    }

  return 0;
}
