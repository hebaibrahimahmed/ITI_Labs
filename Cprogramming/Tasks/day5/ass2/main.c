#include <stdio.h>
#include <stdlib.h>

typedef struct employee
{
int id;
int salary;
int age;
char name[10];
char department[10];

}employee;

int main()
{

employee e;

  printf("please enter the id\n");
  scanf("%d", &e.id);

  printf("please enter the salary\n");
  scanf("%d", &e.salary);

  printf("please enter the age\n");
  scanf("%d", &e.age);

  printf("please enter the name\n");
  scanf("%s",e.name);

  printf("please enter the department\n");
  scanf("%s",e.department);

 printf("the employee details: \n");

    printf("Employee id :%d \n", e.id);
    printf("Employee salary: %d\n", e.salary);
    printf("Employee age: %d\n", e.age);
    printf("Employee Name: %s\n", e.name);
    printf("Employee department: %s", e.department);



 return 0;


}
