#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main()
{

    char firstname[10];
    char lastname[10];
    char fullname[20];

    printf("please enter your first name: ");
    scanf("%s",&firstname);
    printf("please enter your last name: ");
    scanf("%s",&lastname);
     strcpy(fullname,firstname);
     strcat(fullname," ");
     strcat(fullname , lastname);
     printf("the fullname is: %s", fullname);

return 0;

}





