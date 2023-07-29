#include <stdio.h>
#include <stdlib.h>
typedef struct Point{
    int x;
    int y;

}Point;

typedef struct Line{
    Point p1;
    Point p2;
    int length;

}Line;


void length(Line *pLen,int size){
        for(int i=0;i<size;i++){

            (pLen+i)->length = sqrt(  ( ((pLen+i)->p2.x - (pLen+i)->p1.x)  * ((pLen+i)->p2.x - (pLen+i)->p1.x) ) +  (((pLen+i)->p2.y - (pLen+i)->p1.y) * ((pLen+i)->p2.y - (pLen+i)->p1.y) )  );
        }
}
int main()
{
    int x;
    int i;


    printf("plz enter the number of lines\n");

    scanf("%d", &x);

    Line *p = malloc(sizeof(Line)*x);

    for (i=0 ; i<x ; i++)

    {
       printf("Data for line %d : ",i+1);
        printf("Please Enter xStart : ");
        scanf("%d",&p[i].p1.x);
        printf("Please Enter yStart : ");
        scanf("%d",&p[i].p1.y);
        printf("Please Enter xEnd : ");
        scanf("%d",&p[i].p2.x);
        printf("Please Enter yEnd : ");
        scanf("%d",&p[i].p2.y);

    }

   length(p,x);

for (i=0 ; i<x ; i++)
{
      printf("Line %d:%d\t\t",i+1,p[i].length);
}

    return 0;
}
