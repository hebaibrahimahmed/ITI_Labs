#include <stdio.h>
#include <stdlib.h>


typedef struct Employee
{
int id;
int salary ;
}
Employee;

typedef struct Department
{
char name[20];
char number[20];
struct Employee emp;
}Department;

int main()
{
 Employee e ;
 Department dep;

 printf("please enter the id\n");
  scanf("%d", &dep.emp.id);

  printf("please enter the salary\n");
  scanf("%d", &dep.emp.salary);

 printf(" plz enter the department_name\n");
 scanf("%s",dep.name );


  printf(" plz enter the department_number\n");
  scanf("%s",dep.number);



printf("Employee id : %d\n", dep.emp.id);
printf("Employee Salary : %d\n", dep.emp.salary);
printf("department name: %s\n" ,dep.name);
printf("department number: %s",dep.number);

}

