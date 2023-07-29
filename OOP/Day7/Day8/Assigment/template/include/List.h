#ifndef LIST_H
#define LIST_H
using namespace std;
template <class T>
class List
{
      T *arr;
      int size;
      int length = 0;
    public:

        List(int size) {
            this->size = size;
            arr = new T(size);
        }
        T getlast(){
            if(length!=0){
            for(int i=0 ; i<size;i++){
                return arr[length-1];
            }
          }else{
              throw "please add items to array first!!";
          }
        }
        T add(T value){
            if(length==size){
               extend();
            }
            for(int i=0;i<size;i++){
                arr[length] = value;
            }
            length++;

        }
        void display(){
            for(int i=0;i<length;i++){
                cout << "Items of array are "<<arr[i] << endl;
            }
        }
        T getbyindex(int index){
            if(index >= length){
                throw "please enter valid index";
            }else{
                for(int i=0;i<length;i++){
                    return arr[index];
                }
            }
        }
        T removeitem(int index){
            if(index >= length){
                throw "please enter valid index";
            }else{
               /* if(index!=length-1){
                T temp;

                arr[index] = arr[length-1];
                length--;
                temp = arr[length-1];
                arr[length-1] = arr[index];
                arr[index]= temp;
                for(int i=0;i<length;i++){

                    cout << arr[i] << endl;
                }
            }else{
                for(int i=0;i<length;i++){

                    cout << arr[i] << endl;
                }
            }*/

            for(int i=index;i<length-1;i++){
                arr[i]=arr[i+1];
            }
            length--;
            for(int i=0;i<length;i++){

                    cout << arr[i] << endl;
                }
            }
        }
        void extend(){
           T *temp = new T[size * 2];

        for(int index = 0; index < size; index++)
        {
            temp[index] = arr[index];
        }

        size *= 2;
        delete arr;
        arr = temp;
    }
};

#endif // LIST_H
