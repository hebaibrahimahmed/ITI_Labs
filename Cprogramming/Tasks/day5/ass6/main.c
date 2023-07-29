#include <stdio.h>
#include <stdlib.h>
#include<windows.h>
typedef struct employee employee;
struct employee
{
    int id;
    char name[10];
    int age,salary;
};
 employee AddEmployee()  //no input
{
    employee e;         //declare here
     printf("enter id :");
    scanf("%d",&e.id);
    printf("enter name :");
   scanf("%s",&e.name);
    printf("enter age :");
    scanf("%d",&e.age);
    return e;
};
void DisplayEmployee(employee e)
{
     printf("e.id:<%d> \n e.name:<%s> \n e.age:<%d> ",e.id,e.name,e.age);
};

COORD coord={0,0};                   // this is global variable
                                    //center of axis is set to the top left cornor of the screen
 void gotoxy(int x,int y)
 {
   coord.X=x;
   coord.Y=y;
   SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
 }
void SetColor(int ForgC)
 {
    WORD wColor;

    HANDLE hStdOut = GetStdHandle(STD_OUTPUT_HANDLE);
    CONSOLE_SCREEN_BUFFER_INFO csbi;

    if(GetConsoleScreenBufferInfo(hStdOut, &csbi))
    {
        wColor = (csbi.wAttributes & 0xF0) + (ForgC & 0x0F);
        SetConsoleTextAttribute(hStdOut, wColor);
    }
    return;
}

int main()
{
char c;
int current=0;
char menu[3][8]={"New","Display","Exit"};
do{
for(int i=0;i<3;i++)
{
    gotoxy(15,3+(i*2));
    if (i==current)
    {
        SetColor(10);

        printf("%s",menu[i]);
    }
    else{
    SetColor(11);

        printf("%s",menu[i]);


}
}
 c=getch();
if (c==-32)
{

    c=getch();
    switch (c)
    {
    case 80:
        current++; //
        if(current>2)
            current=0;//down
    break;
        case 72:
        current--;//0
         if(current<0)
            current=2;//down
        break;


        }

}else if(c==13){

if (current!=2)

{system("cls") ;

printf("%s <Add new employee> \n",menu[current]);
AddEmployee();
printf("adding done successfully :) ");
}}
if (c==75)
  {

  system("cls");

  break;
  }

}while(c!=27);
   return 0;
}
