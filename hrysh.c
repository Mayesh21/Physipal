#include<stdio.h>
int main(){
    printf("lol");
    printf("%d",__LINE__);
    #line 45
    printf("%d",__LINE__);
    return 0;
}