#include <stdio.h>
#include <stdlib.h>
#define Up 72
#define Down 80

int main()
{
      char ch;

    printf("plz enter a character\n");

     ch=getch();

    if (ch==-32)

{
         ch=getch();
         printf("extened %d",ch);
}

    else

   {
      printf("normal %d",ch );
   }

    return 0;
}

