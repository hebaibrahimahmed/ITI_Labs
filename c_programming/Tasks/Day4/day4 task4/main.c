#include <stdio.h>
#include <stdlib.h>
#include<windows.h>
#define up 72
#define DOWN 80
#define home 71
#define end 79


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
    char arr[3][8]= {"New","Display","Exit"};
    char ch,op;
    int current=0;
    int flag=1;
    do
    {
        system("cls");
        for(int i=0; i<3; i++)
        {
               gotoxy(40,5+(i));
            if(i==current)
            {
                SetColor(11);
            }
            else
            {
                SetColor(8);
            }
            printf("%s \n",arr[i]);
        }
        ch=getche();
        switch(ch)
        {
        case -32:
            ch=getche();
            switch(ch)
            {
            case 72:
                if(current!=0)
                {
                    current--;
                }
                else
                {
                    current=2;
                }
                break;
            case 80:
                if(current==2)
                {
                    current=0;
                }
                else
                {
                    current++;
                }
                break;
            case 27:
                current=3;
                break;
            case 71:
                current=0;
                break;
            }
            break;
        case 13:
            system("cls");
            printf("The Current IS %s\n",arr[current]);
            op=getch();
            if(op==13&&current==2)
            {
                flag=0;
                break;
            }
            break;
        }
    }
    while(flag);

    return 0;
}
