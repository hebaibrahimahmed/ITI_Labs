#include <stdio.h>
#include <stdlib.h>

typedef struct Point
{
 int x;
 int y;

}Point;

typedef struct line
{
     Point p1;
     Point p2;

}Linie;

void change_Position(struct line *L, int newX, int newY)
{
  (*L).p1.x=newX;
  (*L).p1.y=newY;
}
int main ()
{
 struct line L;
 int newx , newy;

 printf("Please Enter the X and Y of point 1\n");
 scanf("%d \n" , & L.p1.x ,& L.p1.y);

 printf("Please Enter the X and Y of point 2\n");
 scanf("%d %d \n", &L.p2.x , &L.p2.y);

 printf("Please Enter the newx and newy \n");
 scanf("%d %d \n", &newx , &newy);

change_Position(&L,newx,newy);

printf("NewX = %d\t NewY = %d ",L.p1.x,L.p1.y);

return 0;
}

















