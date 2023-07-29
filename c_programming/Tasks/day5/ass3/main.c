#include <stdio.h>
#include <stdlib.h>

 typedef struct employee
{
     int id;
     int age;
     char name[20];

}employee;


int main()
{
    employee emps[3];
    int i;

     printf("Enter Employee Details:\n");

     for(int i=0; i<3; i++)
{
    printf("Please enter the ID of the employee\n");
    scanf ("%d",&emps[i].id) ;
    printf("Please enter the age of the employee");
    scanf ("%d",&emps[i].age) ;
    printf("Please enter the name of the employee");
    scanf ("%d",&emps[i].name) ;
}

     printf("\n\tEmployee Details:");

     for(int i=0; i<3; i++)
{
     printf("Employee-Id : %d\n",emps[i].id);

     printf("Name  : %s\n",emps[i].name);

     printf("Age  : %d\n",emps[i].age);
}

     return 0;
}

