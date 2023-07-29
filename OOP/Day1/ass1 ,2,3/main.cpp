#include <iostream>
using namespace std;

typedef struct Employee
{

int ID ;
char Name [10];
int Salary;

}Employee ;

Employee Display(Employee*E, int Size)
{
    for(int i=0 ; i<Size ; i++)
        {
            cout<<"ID: "<<E[i].ID<<"\tName: "<<E[i].Name<<"\tSalary: "<<E[i].Salary<<endl;
        }
}

int main()
{
int array [3];
int size;

Employee *E = new Employee;


   cout << "Enter the number of items:" << "\n";
	cin >>size;

    for (int i = 0; i < size; i++)
    {
        cout << "Enter Array Content [" << i << "]: ";
        cout<<endl<<" enter the id: ";
        cin>>E->ID;
        cout<<endl<<"enter the name: ";
        cin>>E->Name;
        cout<<endl<<"enter the salary: ";
        cin>>E->Salary;
    }

    Display(E,size);

    return 0;
}
