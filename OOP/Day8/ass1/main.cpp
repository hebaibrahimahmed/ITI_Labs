#include <iostream>
using namespace std;

template<class T>

class List {

T *arr;
int size; // size of the array
int length; // number of items in the array
int currentIndex;

public :

   List()
    {
        size =10
       items = new T[10];
       currentIndex = -1;
    }

      ~List()
        {
            delete items;
        }

   ////////////////////////////////////////

    T getlast(){


    if(length=-1)

            {
                List ex;
                strcpy(ex.length, "List is empty");
                ex.length = -1;

                throw ex;

    }

    //////////////////////////////////////////////////////

    void add( T item){


            if(currentIndex == size - 1)
                Extend();

            currentIndex++;
            items[currentIndex];

    };

    void display(){


    };

     void Extend()
        {
            T *temp = new T[size * 2];

            for(int index = 0; index < size; index++)
            {
                temp[index] = items[index];
            }

            delete items;
            items = temp;
            size *= 2;
        }

};


int main()
{
    cout << "Hello world!" << endl;
    return 0;
}
