#include <stdio.h>
#include <stdlib.h>


typedef struct Employee
{
    int ID;
    int Salary;
   char Name[20];
}Employee;


int main()
{

 Employee *emps[3]={NULL};
    int n;
    int len[3];
    int i;


    for (int i=0;i<3;i++)

    {

     printf("Enter the Size of the Pointer %d : ",i+1);

    scanf("%d",&len[i]);

    emps[i] = (Employee *) malloc(len[i]*sizeof(Employee));
    }




   printf("Please Enter the Data of the the employees\n");


  for  ( int i = 0 ; i<3 ; i++ )

 {
   for (int j=0;j<len[i];j++)
   {
  printf("please enter the id %d\n",i+1);
  scanf("%d",&emps[i]->ID );

  printf("please enter the salary %d\n",i+1);
  scanf("%d",&emps[i]->Salary);

 printf(" plz enter the name %d\n",i+1);
 scanf("%s", emps[i]->Name );

   }

 }

 printf("The Data You entered\n");

 for  ( int i = 0 ; i<3 ; i++ )

 {
   for (int j=0;j<len[i];j++)
   {
  printf(" The id of employee %d",i+1);
  printf("%d",emps[i]->ID );

  printf("The salary of employee %d",i+1);
  printf("%d",emps[i]->Salary);

 printf(" The name of employee %d",i+1);
 printf("%s", emps[i]->Name );

 printf(" \n");

   }

 }
  return 0;
}
