#include <stdio.h>
#include <stdlib.h>
#include <windows.h>


 COORD coord={0,0};                   // this is global variable
                                    //center of axis is set to the top left cornor of the screen
 void gotoxy(int x,int y)
 {
   coord.X=x;
   coord.Y=y;
   SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
 }


int main()
{
   int num;

    do{

     gotoxy(30,10);
     printf("1.New\n");
     gotoxy(30,11);
     printf("2.Display\n");
     gotoxy(30,12);
     printf("3.Exit\n");

     gotoxy(30,10);
     printf("1.New\n");
     gotoxy(30,11);
     printf("2.Display\n");
     gotoxy(30,12);
     printf("3.Exit\n");


     gotoxy(30,10);
     printf("1.New\n");
     gotoxy(30,11);
     printf("2.Display\n");
     gotoxy(30,12);
     printf("3.Exit\n");


   printf("Enter Your number:");
    scanf("%d",&num);
        switch (num)

        {
        case 1 :
           system("cls");
           printf("1.New\n");
           break;

        case 2 :

            system("cls");
           printf("2.Display\n");
           break;

        case 3:

           system("cls");
           printf("3.Exit\n");
           break;


        }
                getch();
                } while (num <=3 );


}

