import pandas as pd
import numpy as np


def calculate_all_correlations_from_csv(csv_file, result_column):
    dataframe = pd.read_csv(csv_file)
    numeric_columns = dataframe.select_dtypes(include=[np.number])
    correlations = numeric_columns.corr()
    result_correlations = correlations[result_column]
    
    return result_correlations


csv_file_path = 'out.csv'
result_column = 'Happiness Score'

correlations = calculate_all_correlations_from_csv(csv_file_path, result_column)
correlations.to_csv('correlationResults.csv')
