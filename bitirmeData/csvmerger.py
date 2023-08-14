import csv
import pandas as pd
import os

path = "C:/Users/Oguzcan/Desktop/bitirmeData/datas"
dir_list = os.listdir(path)

frames = []
df2 = pd.read_csv("MutlulukOranlari.csv", sep=',')
df2 = df2.set_index('Country')
frames.append(df2)

for i in dir_list:
    df1 = pd.read_csv("datas/"+ i, sep=';')
    df1 = df1.set_index('name')
    df1.rename(columns = {'value':i[:len(i)-4]}, inplace = True)
    frames.append(df1)




result = pd.concat(frames, axis=1).reindex(frames[0].index)
result.dropna(how='all', axis=1, inplace=True)
result.to_csv('out.csv')
print(result)