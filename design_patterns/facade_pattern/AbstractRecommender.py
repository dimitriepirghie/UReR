from abc import abstractmethod, ABCMeta


class AbstractRecommender(object):
    """
    Abstract Base Class for Proxy
    """

    __metaclass__ = ABCMeta

    @abstractmethod
    def recommend_by_keywords(self, key_words_list=None):
        """
        Recommend resources related with keyword -> resources list of object of Resource Abstract class Type
        :param request:
        :return:
        """
        pass

    @abstractmethod
    def recommend_by_event(self, event = None):
        """
        Recommend resources by an event.
        :param event:
        :return:
        """
        pass
