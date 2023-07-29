#include <stdio.h>
#include <stdlib.h>

int main()
{
    char str[20],ch;
    int count = 0;



  printf("Enter any string: ");
   gets(str);

  printf("Enter a character: ");
  scanf("%c", &ch);



  for (int i=0; i<str[i] ; i++)
    {
    if (ch == str[i])
    {
        count ++;
    }
    }



  printf("Frequency of character %c in string is: %d", ch, count);
    return 0;
}
