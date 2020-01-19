import numpy as np
import matplotlib.pyplot as plt
from sklearn import datasets
from sklearn.model_selection import train_test_split
iris=datasets.load_iris()
x=iris.data
y=iris.target
print("Iris Label :",y)
X=iris.data[ : ,1:3]
x_train,x_test,y_train,y_test=train_test_split(X,y,test_size=0.2,random_state=0)
print(x_train.shape)
print(x_test.shape)
print("y_train .shape",y_train.shape)
print("y_test.shape",y_test.shape)

class SVM:
  def __init__(self,epochs,feature,target,weights,bias):
    self.epochs=epochs
    self.feature=feature
    self.target=target
    self.weights=weights
    self.bias=bias
  def one_v_one(self):
    for i,y in enumerate(self.target):
      if y==0:
        self.target[i]=-1
      else:
        self.target[i]=1
    return self.target
  def predict(self,x):
        """
        Predict the output values for input data using weights and bias
        """
        z=self.weights.T.dot(x)+self.bias
       
        return z
  def hindge(self,y, y_cap):
	     """
		    Hinge loss func
	     """
	      loss= y * y_cap
        print(len(loss))
	      return -loss if loss < 0 else 0

  def fit(self):
        """
        weights and bias are updated using Hinge Loss derivative
        """
        out_values=list()
        for i in range(len(self.target)):
                x = self.feature[i]
                y=self.predict(x)
                out_values.append(y)
                los=self.hindge(self.target[i],out_values[i])
                print("Loss Values are :",los)
                for epoch in range(self.epochs):
                  #self.weights = self.weights+np.power(i+100,-0.8)*los*(self.data[i])
                  #self.bias=self.bias+np.power(i+100,-0.8)*los*1
                  if (los>0):
                   self.weights=self.weights+0.01*((self.feature[i]*self.target[i])+(-2*(1/1+epoch)*self.weights))
                   self.bias=self.bias+0.01*(self.target[i]-(2*(1/1+epoch)*self.weights))
                  else :
                    self.weights=self.weights+0.01*(-2*(1/1+epoch)*self.weights)
                    self.bias=self.bias+0.01*(-2*(1/1+epoch)*self.weights)
          
        return out_values
  
  def slope(self):
        return -(self.bias/self.weights[1])/(self.bias/self.weights[0])

  def y_intercept(self):
        
        intercept=-self.bias/self.weights[1]
        return intercept



  def draw_line(self,line_slope,y_intercept):
        l=list()
        for i in range(0,4):
            y=line_slope*self.data[i][0]+y_intercept # using y=mx+c form
            l.append(y)
        return l
 
weights=np.zeros(len(x_train[0]))  
bias=np.ones(1)
print(len(x_train[0]))
svm=SVM(10,x_train,y,weights,bias)
modified_target=svm.one_v_one()
print("Modified_target ",modified_target)

predicted_values=svm.fit()
slope=svm.slope()
y_intercept=svm.y_intercept()
y=svm.draw_line(slope,y_intercept)


print("Predicted Output Values:",predicted_values)
print("Updated Weights according to Hinge Loss: ",svm.weights)
print("Updated Bias according to Hinge Loss :",svm.bias)
print("Slope to draw decision boundary :",slope)
print("Y-intercept to draw decision boundary :",y_intercept)
print("y_axis values to draw decision boundary:",y)
plt.scatter(x_train[:,0],x_train[:,1],c=y_train)
plt.plot(data[:,0],y)
plt.show()
